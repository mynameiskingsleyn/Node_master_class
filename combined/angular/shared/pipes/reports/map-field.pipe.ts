import { Pipe, PipeTransform } from '@angular/core';
import { FieldMappings } from './field-mappings';

@Pipe({
  name: 'mapField'
})
export class MapFieldPipe implements PipeTransform {
  transform(value: any, defaultMap?: any): any {
    return FieldMappings.map(value) || (defaultMap || value);
  }
}
