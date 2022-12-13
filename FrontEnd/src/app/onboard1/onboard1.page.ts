import { Component, OnInit } from '@angular/core';

import { Router } from '@angular/router';

@Component({
  selector: 'app-onboard1',
  templateUrl: './onboard1.page.html',
  styleUrls: ['./onboard1.page.scss'],
})

export class Onboard1Page implements OnInit {

  constructor(public router:Router) { }

  ngOnInit() {
  }
  
  nextpage(){
    this.router.navigateByUrl("/onboard2");
  }
}