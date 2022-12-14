import { Component, OnInit } from '@angular/core';

import { AccountService } from '../services/account.service';

import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  uinvalue: any;
  pinvalue: any;
  uvalid: boolean = false;
  pvalid: boolean = false;
  creds: boolean = true;
  signbtn: boolean = true;
  thebtn: any;

  constructor(private service:AccountService, public router:Router) { }

  ngOnInit() {
    this.thebtn = "sign";
  }

  checkusername(){
    // check if uinvalue is atleast 3 characters long
    if(this.uinvalue.length >= 3){
      this.uvalid = true;
    }
    else {
      this.uvalid = false;
    }
    this.checkall();
  }

  checkpass(){
    if(this.pinvalue.length >= 8){
      this.pvalid = true;
    }
    else {
      this.pvalid = false;
    }
    this.checkall();
  }

  checkall(){
    if(this.uvalid && this.pvalid){
      this.signbtn = false;
      this.thebtn = "signs";
    }
    else {
      this.signbtn = true;
      this.thebtn = "sign";
    }
  }

  login(){
    this.creds = true;
    this.service.login(this.uinvalue, this.pinvalue).subscribe(
      (data:any) => {
        if(data["status"] == 200){
          localStorage.setItem("user_id", data["user_id"]);
          localStorage.setItem("username", data["username"]);
          localStorage.setItem("email", data["email"]);
          localStorage.setItem('pp', data["profile_picture"]);
          this.router.navigate(['/home']);
        }
        else if (data["status"] == 401){
          this.creds = false;
        }
        else{
          alert("Something went wrong, please try again");
        }
      });
  }

}
