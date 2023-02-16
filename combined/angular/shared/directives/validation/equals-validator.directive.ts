import { Attribute, Directive, forwardRef } from '@angular/core';
import { Validator, AbstractControl, NG_VALIDATORS } from '@angular/forms';

@Directive({
    selector: '[appValidateEqual]',
    providers: [
        { provide: NG_VALIDATORS, useExisting: forwardRef(() => EqualValidatorDirective), multi: true }
    ]
})
export class EqualValidatorDirective implements Validator {

    constructor(
      @Attribute('appValidateEqual') public validateEqual: string,
      @Attribute('reverse') public reverse: string) { }

    private get isReverse() {
        if (!this.reverse) {
          return false;
        }
        return this.reverse === 'true' ? true : false;
    }

    validate(c: AbstractControl): { [key: string]: any } {
        // self value
        const v = c.value;
        // control vlaue
        const e = c.root.get(this.validateEqual);
        // value not equal
        if (e && v !== e.value && !this.isReverse) {
            return { noMatch: true };
        }
        // value equal and reverse
        if (e && v === e.value && this.isReverse) {
            const noMatchKey = 'noMatch';
            if (e.errors && e.errors[noMatchKey]) {
                delete e.errors[noMatchKey];
            }
            if (!Object.keys(e.errors).length) {
               e.setErrors(null);
            }
        }
        // value not equal and reverse
        if (e && v !== e.value && this.isReverse) {
            e.setErrors({ noMatch: true });
        }
        return null;
    }
}
