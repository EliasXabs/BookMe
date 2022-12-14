import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.page.html',
  styleUrls: ['./signup.page.scss'],
})
export class SignupPage implements OnInit {

  uinvalue: any;
  
  constructor() { }
  
  ngOnInit() {
  }
  
  checkusername(){
    // check if uinvalue is atleast 3 characters long
    if(this.uinvalue.length >= 3){
      
    }
  }

  signup(){
    
  }
}
