import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-uniqueid',
  templateUrl: './uniqueid.component.html',
  styleUrls: ['./uniqueid.component.sass']
})
export class UniqueidComponent {

  @Input() uniqueid: string;

  public get uniqueidMasked(): string {
    return this.uniqueid.slice(0, 5) + '..' + this.uniqueid.slice(-5);
  }

}
