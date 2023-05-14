function validaCad(){

    nome = document.querySelector("#nome")
    sobrenome = document.querySelector("#sobrenome")
    email = document.querySelector("#email")
    senha = document.querySelector("#senha")
    telefone = document.querySelector("#telefone")
    resposta = document.querySelector("#resposta-cad")
    if(nome.value.length <4){

        resposta.innerHTML = "<p>O nome deve conter no mínimo quatro caracteres</p>"
        return false
    }else if(sobrenome.value.length <4){

        resposta.innerHTML = "<p>O sobrenome deve conter no mínimo quatro caracteres</p>"
        return false
    }else if(senha.value.length <12){

        resposta.innerHTML = "<p>A senha deve conter no mínimo doze caracteres</p>"
        return false
    }else{

        return true

    }

}
function validaEntrar(){

    username = document.querySelector("#username")
    senha = document.querySelector("#senha2")
    resposta = document.querySelector("#resposta-cad")
    if(senha.value.length <12){

        resposta.innerHTML = "<p>A senha deve conter no mínimo 12 caracteres</p>"
        return false
    }else{

        return true

    }

}
function ajax(url,methods,bodys,resposta, valida){
    
    
       if(valida){
            fetch(url,{
                
                method:methods,
                body:bodys
            }).then(function (response){
                console.log(response)
                response.json().then(function (response){
                    console.log(response)
                    if(response.retorno == true && response.func == "entrar"){

                        window.location.href = "./index.php?pg=usuario"

                    }else if(response.retorno == true && response.func =="sair"){
                        window.location.href="./index.php"

                    }else{

                        resposta.innerHTML = response.msg;

                    }

                })

            })
        }

    

}
window.addEventListener("load",function (){
    let form = document.querySelector("#form-cad")
    form.addEventListener("submit",function (event){
        event.preventDefault()
        ajax("./system/API/API.php?func=cadastro","POST",new FormData(form),document.querySelector("#resposta-cad"),validaCad())

        })

        let formEntrar = document.querySelector("#form-entrar")
        formEntrar.addEventListener("submit",function (event){

           event.preventDefault()
           ajax("./system/API/API.php?func=entrar","POST",new FormData(formEntrar),document.querySelector("#resposta-cad"),validaEntrar())

        })
    
    

})