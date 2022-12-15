import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  profile: any ;

  constructor() {}
  
  ngoninit() {
    this.profile = "data:image/png;base64,"+ localStorage.getItem('pp');
  }
}
