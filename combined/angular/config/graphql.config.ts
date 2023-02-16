import { environment } from '@environment';
import { InjectionToken } from '@angular/core';

export interface GraphQLConfig {
    graphqlURI: string;
}

export const BACKEND_GRAPHQL_CONFIG: GraphQLConfig = {
    graphqlURI: environment.graphqlURI
};

export const GRAPHQL_CONFIG = new InjectionToken<GraphQLConfig>('config.graphql');
