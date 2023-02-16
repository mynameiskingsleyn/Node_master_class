import { Component, OnInit } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-auth-help',
  templateUrl: './auth-help.component.html',
  styleUrls: ['./auth-help.component.sass']
})
export class AuthHelpComponent implements OnInit {

  constructor(private snackBar: MatSnackBar) { }

  ngOnInit() {
    this.snackBar.dismiss();
  }

}
