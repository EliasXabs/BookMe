import { baseurl } from './../../main';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AccountService {

  constructor(private http:HttpClient) { }

  signup(name:string, email:string, password:string){
    let Data = new FormData();
    Data.append('username', name);
    Data.append('email', email);
    Data.append('password', password);
    const response = this.http.post( baseurl + "signup.php", Data);
    return response;
  }
}
