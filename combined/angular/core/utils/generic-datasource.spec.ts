import { AlertsDataSource } from '../alerts/alerts-datasource';
import { GenericDataSource } from './generic-datasource';

describe('GenericDataSource', () => {
  it('should create an instance', () => {
    expect(new GenericDataSource(null)).toBeTruthy();
  });
});
