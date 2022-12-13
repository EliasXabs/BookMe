import { Component, OnInit } from '@angular/core';

import { Router } from '@angular/router';


@Component({
  selector: 'app-onboard2',
  templateUrl: './onboard2.page.html',
  styleUrls: ['./onboard2.page.scss'],
})
export class Onboard2Page implements OnInit {

  constructor(public router:Router) { }

  ngOnInit() {
  }

  nextpage(){
    this.router.navigateByUrl("/onboard3");
  }
}
