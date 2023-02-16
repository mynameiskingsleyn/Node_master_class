import { Injectable } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { environment } from '@environment';
import { Router, ActivationEnd, ChildActivationEnd } from '@angular/router';
import { filter } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class TitleService {
  private title: string;

  public constructor(
    private titleService: Title,
    private router: Router
  ) {
    if (environment.app.title) {
      this.title = environment.app.title;
    }

    this.setTitle(this.title);
    this.setRoutedTitle();
  }

  setTitle(title: string) {
    this.titleService.setTitle(title);
  }

  getTitle() {
    return this.titleService.getTitle();
  }

  setRoutedTitle() {
    this.router.events
      .pipe(
        filter(
          e => e instanceof ActivationEnd || e instanceof ChildActivationEnd
        )
      )
      .subscribe((e: any) => {
        if (e.snapshot && e.snapshot.data) {
          if (e.snapshot.data.hasOwnProperty('title')) {
            this.setTitle(
              this.title + ' - ' + e.snapshot.data.title
            );
          }
        }
      });
  }
}
