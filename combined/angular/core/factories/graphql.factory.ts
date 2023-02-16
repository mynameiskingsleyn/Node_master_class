import { HttpLink } from 'apollo-angular/http';
import { ApolloLink, InMemoryCache } from '@apollo/client/core';
import { GraphQLConfig } from '@app/config/graphql.config';
import { onError } from '@apollo/client/link/error';
import { environment } from '@environment';
import { LnxErrorHandlerService, LnxNetworkError } from '@lnx/core';

export function GraphQLFactory(httpLink: HttpLink, config: GraphQLConfig, errorHandler: LnxErrorHandlerService) {

  const errorLink = onError(({ graphQLErrors, networkError }) => {
    if (graphQLErrors) {
      const errors = errorHandler.parse(graphQLErrors as any);
      errorHandler.report(errors);
    }
    if (networkError) {
      errorHandler.report([new LnxNetworkError('Network error occurred please try again. If the problem persists,'
        + 'contact the support team.')]);
    }
  });

  const httpLinker = httpLink.create({
    uri: config.graphqlURI
  });

  const graphqlLink = ApolloLink.from([
    errorLink,
    httpLinker
  ]);

  const clientIp = sessionStorage.getItem('ip');
  let clientIpLink = null;

  if (clientIp) {
    clientIpLink = new ApolloLink((operation, forward) => {
      operation.setContext({
          headers: {
            'x-forwarded-for': clientIp ? `${clientIp}` : ''
          }
      });
      // Call the next link in the middleware chain.
      return forward(operation);
    });
  }

  const cache = new InMemoryCache({
    addTypename: true
  });

  return {
    link: (clientIp && clientIpLink) ? clientIpLink.concat(graphqlLink) : graphqlLink,
    cache,
    defaultOptions: {
      watchQuery: {
        errorPolicy: 'ignore',
        fetchPolicy: 'no-cache'
      }
    },
    connectToDevTools: (environment.production ? false : true)
  };
}
