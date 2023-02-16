import { Component, OnInit } from '@angular/core';
import { AccessibilityService } from './shared/services/accessibility.service';
import { TitleService } from './shared/services/title.service';

@Component({
  selector: 'app-root',
  template: '<router-outlet></router-outlet>',
})
export class AppComponent implements OnInit {

  public constructor(
    private titleService: TitleService,
    private accessibilityService: AccessibilityService
  ) {
  }

  ngOnInit(): void {
    this.accessibilityService.start();
  }

}
