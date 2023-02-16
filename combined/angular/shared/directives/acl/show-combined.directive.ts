import { Directive, ElementRef, TemplateRef, ViewContainerRef, OnInit } from '@angular/core';
import { AclService } from '@shared/services/acl/acl.service';

@Directive({
  // eslint-disable-next-line @angular-eslint/directive-selector
  selector: '[showCombined]'
})
export class ShowCombinedDirective implements OnInit {

  constructor(
    private element: ElementRef,
    private templateRef: TemplateRef<any>,
    private viewContainer: ViewContainerRef,
    private aclService: AclService
  ) { }

  ngOnInit(): void {
    this.updateView();
  }

  private updateView() {
    if (this.aclService.hasCombinedEnabled()) {
        this.viewContainer.createEmbeddedView(this.templateRef);
    } else {
      this.viewContainer.clear();
    }
  }
}
