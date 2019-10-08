import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { Persona } from '../person';
import { FormControl, FormGroup, FormBuilder, FormArray, ValidatorFn } from '@angular/forms';

@Component({
  selector: 'app-persona',
  templateUrl: './persona.component.html',
  styleUrls: ['./persona.component.scss']
})
export class PersonaComponent implements OnInit {

  persona: Persona[];
  selecPerson: Persona = {
    id: null,
    nombre: null,
    genero: null,
    edad: null,
    sueldo: null,
    contrato: null
  };

  constructor(private apiService: ApiService) { }

  ngOnInit() {
    this.apiService.leerEmpleado().subscribe((personas: Persona[]) => {
    this.persona = personas;
    console.log(this.persona);
    });
  }

  crearUpdateEmpleado(form: any) {
    if (this.selecPerson && this.selecPerson.id) {
      form.value.id = this.selecPerson.id;
      this.apiService.updateEmpleado(form.value).subscribe((person: Persona) => {
        console.log ('Persona Actualizada =', person);
      });
    } else {
      this.apiService.crearEmpleado(form.value).subscribe((person: Persona) => {
        console.log('Persona Creada', person);
        location.reload();
      });
    }
  }

  selePersona(person: Persona) {
    this.selecPerson = person;
  }
}
