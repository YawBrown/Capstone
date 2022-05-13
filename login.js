const form = document.getElementById('login-form'); 
const Username = document.getElementById('Username'); 
const pass = document.getElementById('password'); 
 
 
function LoginValidation(){ 
 
    const Username= Username.value; 
    const Password= pass.value; 
  
    if(Username === '' && Password ===''){ 
        Empty(Username,'Username cannot be blank'); 
        Empty(pass, 'Password cannot be blank'); 
        return false; 
 
    }else if(Password !== ''  && Username===''){ 
        Empty(Username, 'Username cannot be blank'); 
        NotEmpty(pass); 
        return false; 
    }else if(Password !=='' && !CheckUsername(Username)){ 
        Empty(Username, 'Invalid Username'); 
        NotEmpty(pass); 
        return false; 
 
    }else if(!CheckUsername(Username) && Password === ''){ 
        Empty(Username, 'Invalid Username'); 
        Empty(pass, 'Password cannot be blank'); 
        return false; 
    }else if(Username!== '' && Password ===''){ 
        NotEmpty(Username); 
        Empty(pass, 'Password cannot be blank'); 
        return false; 
    }  
 
} 
 
 
function Empty(input, message){ 
    const FormDiv = input.parentElement; 
    const small = FormDiv.querySelector('small'); 
    FormDiv.className = 'form-fill error'; 
    small.innerText = message; 
     
} 
 
function NotEmpty(input){ 
    const LoginPage = input.parentElement; 
    LoginPage.className = 'form-fill success'; 
} 
 
function CheckUsername(Username){ 
    return '/^[^@]+@[^@]+\.[^@]+$/'.test(Username); 
 
}