function f1()
{
  x=document.getElementById("p-name");
  m=x.value.match(/^[a-zA-Z'-]+\.?[a-zA-Z'-]*$/);
  if(!m)
  { 
  alert("The given name format is wrong");
  x.value=' ';

   }

   }
function f3()
{
  x=document.getElementById("p-email");
  m=x.value.match(/@bmsce.ac.in$/);
  if(!m)
  {
   
  alert("The given email address format is wrong");
   x.value=' ';
   }

}
function f4()
{
  x=document.getElementById("p-addr");
  m=x.value.match(/\w/g);
   if(m=='\0')
   {
      alert("The given address is wrong");
	  x.value=' ';
	}

	}
  
function f5()
{
 x=document.getElementById("p-phno");
 m=x.value.match(/^\d{10}$/);
 if(!m)
 {
  alert("The given phone number format is wrong.Please Re-enter");
	 x.value=' ';
	 
	 
 }

}