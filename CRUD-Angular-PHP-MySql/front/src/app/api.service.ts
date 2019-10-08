import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Persona } from './person';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  PHP_API_SERVER = 'http://127.0.0.1:80/';


  constructor(private httpClient: HttpClient) { }

  leerEmpleado(): Observable<Persona[]> {
    return this.httpClient.get<Persona[]>(`${this.PHP_API_SERVER}/back/api/leer.php`);
  }

  crearEmpleado(persona: Persona): Observable<Persona> {
    return this.httpClient.post<Persona>(`${this.PHP_API_SERVER}/back/api/crear.php`, persona);
  }

  updateEmpleado(persona: Persona) {
    return this.httpClient.put<Persona>(`${this.PHP_API_SERVER}/back/api/update.php`, persona);
  }
}
