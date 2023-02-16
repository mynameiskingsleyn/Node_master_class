import {
  Injectable,
  Injector,
  ComponentFactoryResolver,
  ComponentRef,
  ApplicationRef,
  EmbeddedViewRef,
  Type
} from '@angular/core';
import { PopoverComponent } from '../components/popover/popover.component';
import { SharedModule } from '../shared.module';
import { PopoverConfig } from '../components/popover/popover-config.config';
import { PopoverInjector } from '../components/popover/popover.injector';
import { Subscription } from 'rxjs';
import { PopoverPosition } from '../components/popover/popover-position.type';

@Injectable({
  providedIn: SharedModule
})
export class PopOverService {

  popoverComponentRef: ComponentRef<PopoverComponent>;

  private closeSubscription: Subscription;

  constructor(
    private componentFactoryResolver: ComponentFactoryResolver,
    private appRef: ApplicationRef,
    private injector: Injector
  ) { }

  open(componentType: Type<any>, config: PopoverConfig) {
    if (this.popoverComponentRef) {
      this.removePopover();
    }
    this.appendPopover(config);
    this.popoverComponentRef.instance.contentType = componentType;
    this.closeSubscription = this.popoverComponentRef.instance.close().subscribe(closed => {
      if (closed) {
        this.close();
      }
    });
  }

  close() {
    this.removePopover();
    if (this.closeSubscription) {
      this.closeSubscription.unsubscribe();
    }
  }

  getPopoverPosition(element: HTMLElement): PopoverPosition {
    const bodyRect = document.body.getBoundingClientRect();
    const elementRect = element.getBoundingClientRect();
    return new PopoverPosition(elementRect.top - bodyRect.top, elementRect.left - bodyRect.left, elementRect.width / 2);
  }

  private appendPopover(config: PopoverConfig) {
    const map = new WeakMap();
    map.set(PopoverConfig, config);

    const componentFactory = this.componentFactoryResolver.resolveComponentFactory(PopoverComponent);
    const componentRef = componentFactory.create(new PopoverInjector(this.injector, map));

    this.appRef.attachView(componentRef.hostView);

    const domElem = (componentRef.hostView as EmbeddedViewRef<any>).rootNodes[0] as HTMLElement;
    document.body.appendChild(domElem);
    this.popoverComponentRef = componentRef;
  }

  private removePopover() {
    this.appRef.detachView(this.popoverComponentRef.hostView);
    this.popoverComponentRef.destroy();
  }

}
