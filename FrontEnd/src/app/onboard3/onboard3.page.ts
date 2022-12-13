import { Component, OnInit } from '@angular/core';

import { Router } from '@angular/router';

@Component({
  selector: 'app-onboard3',
  templateUrl: './onboard3.page.html',
  styleUrls: ['./onboard3.page.scss'],
})
export class Onboard3Page implements OnInit {

  constructor(public router:Router) { }

  ngOnInit() {
  }

  nextpage(){
    this.router.navigateByUrl("/onboard3");
  }
}
