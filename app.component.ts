import { Component,OnInit } from '@angular/core';
import { AppService } from './api.service';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})



 
export class AppComponent implements OnInit
{  
  title = 'exincome';

  list:any = [];
  expenses:any = [];
  exincome:any = [];
  udate:any;
  utype:any;
  ucate:any;
  udesc:any;
  uamt:any;
  incomee:any;
  expene:any ;
  totalIncome:any;
  totalExpense:any;
  totalBalance:any;
  name:any;
  
  // l:any;u:any;d:any;
     incomeFunction(){
        this.incomee = true;
        this.expene = false;
     }
     expenseFunction(){
        this.expene=true;
        this.incomee=false;
     }
  
     add(){
       let f = {
         date : this.udate,
         type : this.utype,
         categories : this.ucate,
         description:this.udesc,
         amount:this.uamt,
         incomee:false,
         expene:false,
   
       };
       this.exincome.push(f);
      //  console.log(this.dummy)
      //  localStorage.setItem('dummy',JSON.stringify(this.dummy));
  
       let obj = this.exincome.filter((a:any)=>a.type === 'income');
       console.log(obj);
       this.totalIncome = obj.reduce((a:number,b:any)=>{
          return a + parseInt(b.amount);
        },0);
      //  console.log(this.totalIncome);
       let obj1 = this.exincome.filter((x:any)=>x.type === 'expense');
       this.totalExpense = obj1.reduce((a:number,b:any)=>{
         return a + parseInt(b.amount);
       },0);
      //  console.log(this.totalExpense);
       this.totalBalance = (parseInt(this.totalIncome )- parseInt(this.totalExpense));
      //  console.log(this.totalBalance);
       localStorage.setItem("a",this.totalIncome);
       localStorage.setItem("b",this.totalExpense);
       localStorage.setItem("c",this.totalBalance);
  
      //  this.l = localStorage.getItem("a");
      //  this.u=localStorage.getItem("b");
      //  this.d=localStorage.getItem("c");
  
     }
  
     delete(i: any){
       let arrEl = this.exincome[i];
      //  var qua = arrEl.amount;
      //  console.log(qua);
      if(arrEl.type === 'income')
      {
        let qua = arrEl.amount;
        this.totalIncome = this.totalIncome - (parseInt(qua));
        // this.totalBalance = this.totalIncome - this.totalBalance;
        this.totalBalance = (parseInt(this.totalBalance) - parseInt(qua));
        // console.log(this.totalBalance);
      }else if(arrEl.type ==='expense')
      {
        let aqua = arrEl.amount;
        this.totalExpense = this.totalExpense - (parseInt(aqua));
        // this.totalBalance = this.totalBalance - this.totalExpense;
        this.totalBalance = (parseInt(this.totalBalance)+parseInt(aqua));
        // console.log(this.totalBalance);
      }
      this.exincome.splice(i, 1);
    }

    constructor(private api: AppService) {
      this.loadData();
      console.log('Request sent');
  
    }
  
    async loadData() {
      try {
        let res: any = await this.api.get(`http://localhost/loaditems.php`);
        console.log('Response is ', res);
this.exincome=res.data;
        this.title = res.name;
      } catch (e) {
  
      }
    }
  
    saveItem() {
      this.api.post('http://localhost/loaditems.php',
      {name: this.name}).then((x:any) => {
        console.log('Item Saved', x);
      }).catch((x:any) => {
        console.error('Error is', x);
      });
    }
  
    loadItems() {
      this.api.get('http://localhost/loaditems.php').then((x:any) => {
        console.log('Itemsloaded', x);
      }).catch((x:any) => {
        console.error('Error is', x);
      });
    }
    refresh() {
      setInterval(function () {
        document.location.reload();
      }, 100);
      window.localStorage.removeItem('exincome');
    }
  

    
    ngOnInit(): void {
    }
  
  }

