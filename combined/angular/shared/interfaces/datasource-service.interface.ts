export interface DataSourceService {
  fetch<T>(arg: T): any;
}
