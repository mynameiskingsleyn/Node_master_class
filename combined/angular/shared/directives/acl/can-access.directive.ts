import { Directive, ElementRef, TemplateRef, ViewContainerRef, Input } from '@angular/core';
import { AclService } from '@shared/services/acl/acl.service';

@Directive({
  // eslint-disable-next-line @angular-eslint/directive-selector
  selector: '[canAccess]'
})
export class CanAccessDirective {

  private permissions: string[] = [];

  constructor(
    private element: ElementRef,
    private templateRef: TemplateRef<any>,
    private viewContainer: ViewContainerRef,
    private aclService: AclService
  ) { }

  @Input()
  set canAccess(value) {
    this.permissions = value;
    this.updateView();
  }

  private updateView() {
    if (this.checkPermissions()) {
        this.viewContainer.createEmbeddedView(this.templateRef);
    } else {
      this.viewContainer.clear();
    }
  }

  private checkPermissions(): boolean {
    return this.permissions.some(permission => this.aclService.allowedPermission(permission) === true);
  }
}
