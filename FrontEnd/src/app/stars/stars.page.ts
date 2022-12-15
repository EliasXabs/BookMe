import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-stars',
  templateUrl: './stars.page.html',
  styleUrls: ['./stars.page.scss'],
})
export class StarsPage implements OnInit {

  profile: any ;

  constructor() { }

  ngOnInit() {
    this.profile = "data:image/png;base64,"+ localStorage.getItem('pp');
  }

}
