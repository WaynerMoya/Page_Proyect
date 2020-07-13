import { Component, OnInit,ViewChild  } from '@angular/core';

@Component({
  selector: 'app-main',
  templateUrl: './main.component.html',
  styleUrls: ['./main.component.css']
})
export class MainComponent implements OnInit {
  constructor() {  
   console.log("si")
  }  
  paused = false;
  images = [
    {src : 'assets/images/bg1.jpg', text:'Imagen 1'},
    {src : 'assets/images/bg2.jpg', text:'Imagen 2'}
  ]
 
  ngOnInit(): void {  }
}
