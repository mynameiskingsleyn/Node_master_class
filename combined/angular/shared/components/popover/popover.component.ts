import {
    Component,
    AfterViewInit,
    OnDestroy,
    Type,
    ComponentRef,
    ViewChild,
    ComponentFactoryResolver,
    ChangeDetectorRef,
    HostListener,
    ElementRef
} from '@angular/core';
import { PopoverDirective } from '@app/shared/directives/popover.directive';
import { Subject, Observable } from 'rxjs';
import { PopoverConfig } from './popover-config.config';

@Component({
  selector: 'app-popover',
  templateUrl: './popover.component.html',
  styleUrls: ['./popover.component.sass']
})
export class PopoverComponent implements AfterViewInit, OnDestroy {

  componentRef: ComponentRef<any>;
  contentType: Type<any>;

  @ViewChild(PopoverDirective, { static: true }) insertionPoint: PopoverDirective;

  closeSubject: Subject<boolean> = new Subject<boolean>();

  constructor(
    private componentFactoryResolver: ComponentFactoryResolver,
    private cd: ChangeDetectorRef,
    private elementRef: ElementRef,
    private config: PopoverConfig
  ) { }

  @HostListener('document:click', ['$event'])
  clickOut(event) {
    if (!this.elementRef.nativeElement.contains(event.target)) {
      this.closeSubject.next(true);
    }
  }

  ngAfterViewInit() {
    const popoverElement: HTMLElement = this.elementRef.nativeElement.querySelector('.popover') as HTMLElement;
    // This '8' static number represents the height of the popover arrow
    const popoverTop = this.config.data.top - popoverElement.offsetHeight - 8;
    const popoverLeft = (this.config.data.left - (popoverElement.offsetWidth / 2)) + this.config.data.offsetLeft;
    popoverElement.style.top = popoverTop + 'px';
    popoverElement.style.left = popoverLeft + 'px';

    this.refreshContent();
  }

  ngOnDestroy() {
    this.destroyContent();
  }

  close(): Observable<boolean> {
      return this.closeSubject;
   }

  private refreshContent() {
    this.loadContent(this.contentType);
    this.cd.detectChanges();
  }

  private loadContent(componentType: Type<any>) {
    const componentFactory = this.componentFactoryResolver.resolveComponentFactory(componentType);
    const viewContainerRef = this.insertionPoint.viewContainerRef;
    viewContainerRef.clear();
    this.componentRef = viewContainerRef.createComponent(componentFactory);
  }

  private destroyContent() {
    if (this.componentRef) {
      this.componentRef.destroy();
      this.elementRef.nativeElement.removeEventListener('document:click', this.clickOut);
    }
  }

}
