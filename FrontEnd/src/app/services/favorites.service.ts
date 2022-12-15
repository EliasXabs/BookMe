import { baseurl } from 'src/main';
import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class FavoritesService {

  constructor(private http:HttpClient) { }

  getfavorites(user_id: string){
    let userid = parseInt(user_id.toString());
    let response = this.http.get(baseurl + "favorite.php?userid=" + userid);
    return response
  }
}
