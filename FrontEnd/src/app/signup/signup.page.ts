import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.page.html',
  styleUrls: ['./signup.page.scss'],
})
export class SignupPage implements OnInit {

  uinvalue: any;
  einvalue: any;
  pinvalue: any;
  cinvalue: any;
  namehelp: boolean = false;
  emailhelp: boolean = false;
  passhelp: boolean = false;
  nameerror: boolean = true;
  emailerror: boolean = true;
  passmatch: boolean = true;
  signbtn: boolean = true;

  constructor() { 

  }
  
  ngOnInit() {
  }
  
  checkusername(){
    // check if uinvalue is atleast 3 characters long
    if(this.uinvalue.length >= 3){
      this.namehelp = true;
    }
    else{
      this.namehelp = false;
    }
    this.checkall();
  }

  checkemail(){
    // check if email has at least 1 @ and 1 .\
    if(this.einvalue.includes('@') && this.einvalue.includes('.')){
      this.emailhelp = true;
    }
    else{
      this.emailhelp = false;
    }
    this.checkall();
  }

  checkpass(){
    if(this.pinvalue.length >= 8){
      this.passhelp = true;
      this.passmatch =false;
    }
    else{
      this.passhelp = false;
    }
    this.checkconfirm();
    this.checkall();
  }
  checkconfirm(){
    if(this.cinvalue == this.pinvalue){
      this.passmatch = true;
    }
    else{
      this.passmatch = false;
    }
    this.checkall();
  }

  checkall(){
    console.log(this.namehelp);
    console.log(this.emailhelp);
    console.log(this.passhelp);
    console.log(this.passmatch);
    if(
      this.namehelp == true &&
      this.emailhelp == true &&
      this.passhelp == true &&
      this.passmatch == true
    ){
      this.signbtn = false;
    }
    else{
      this.signbtn = true;
    }
  }

  signup(){
    
  }
}
