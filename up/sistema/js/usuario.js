async function ajax(url){
    
    
        await fetch(url,{method:"GET"}).then(function (response){
             console.log(response)
             response.json().then(function (response){
                 console.log(response)
                 if(response.retorno == true && response.func == "sair"){

                     window.location.href = "./index.php"

                 }
             })

         })
     }
async function ajaxPadrao(url,valida,metodo,form,resposta){

    if(valida){
       await fetch(url,{

            method:metodo ,
            body:form

        }).then(function (response){
            response.json().then(function (response){
                
                ajaxAvancado("./system/API/API.php?func=listar-pasta",true,"GET",null)
                nome = document.querySelector("#nome")
                nome.value = ""

            })

        })

    }
}
 function ajaxAvancado(url,valida,metodo,resposta){

    if(valida){

        fetch(url,{
            method:metodo

        }).then(function (response){

            response.json().then(async function (resp){
                
                console.log(response)
                remove = document.querySelectorAll("#conteudo >*")
                for(let i = 0; i<remove.length; i++){
                        remove[i].remove()
                }
                conteudo = document.querySelector("#conteudo")
                ul = document.createElement("ul")
                ul.setAttribute("id","lista-pasta")
                for(let i = 0; i< resp.length;i++){
                    await fetch("./system/API/API.php?func=listar-arquivos&id-pasta="+resp[i].idPasta,{method:"GET"}).then(function (response){
                        ul2 = document.createElement("ul")
                        ul2.setAttribute("class","arq")
                        
                        response.json().then(function (response){
                            console.log(response)

                            response.forEach(function (e){
                                li2 = document.createElement("li")
                                a2 = document.createElement("a")
                                a2.setAttribute("href","./system/API/API.php?func=get-arquivo&id-arquivo="+e.id_arquivo+"&id-pasta="+resp[i].idPasta)
                                a2.setAttribute("target","_blank")
                                txt2 = document.createTextNode(e.nome)
                                a2.appendChild(txt2)
                                li2.appendChild(a2)
                                ul2.appendChild(li2)
                                li.appendChild(ul2)
                               
                               
                            })  

                        })
                    

                   })
                   li = document.createElement("li")
                   txt = document.createTextNode("/"+resp[i].nome)
                   a = document.createElement("button")
                   a.appendChild(txt)
                   a.setAttribute("class","form-control pasta")
                   li.appendChild(a)
                   ul.appendChild(li)
                    
                }
                
                conteudo.appendChild(ul)

                })

            })

    


    }

}  
window.addEventListener("load",async function (){
    
    ajaxAvancado("./system/API/API.php?func=listar-pasta",true,"GET",null)
    

    sair = document.querySelector("#sair")
    sair.addEventListener("click",function (event){
        event.preventDefault()
        ajax("./system/API/API.php?func=sair")

    })
    criarPasta = document.querySelector("#cria-pasta")
    criarPasta.addEventListener("submit", function (event){

        event.preventDefault()
        ajaxPadrao("./system/API/API.php?func=criar-pasta",true,"POST",new FormData(document.querySelector("#cria-pasta")),resposta)

    })
    upload = document.querySelector("#upload")
    upload.addEventListener("submit", async function (event){
        event.preventDefault()
        formData = new FormData(upload)
      await  fetch("./system/API/API.php?func=upload",{
            method:"POST",
            body:formData
        }).then(function (response){

            response.json().then(function (response){
                alert("funcionou")
                ajaxAvancado("./system/API/API.php?func=listar-pasta",true,"GET",null)

            })

        })

    })
    btnup = document.querySelector("#btn-up")
    btnup.addEventListener("click", function (){

        fetch("./system/API/API.php?func=listar-pasta",{method:"GET"}).then(async function (response){

            response.json().then(async function (response){
                remove = document.querySelectorAll("#select>*")
                remove.forEach(function (e){

                    e.remove()

                })
                select = document.querySelector("#select")
               await response.forEach(function (e){

                    op = document.createElement("option")
                    op.setAttribute("value",e.idPasta)
                    op.appendChild(document.createTextNode(e.nome))
                    select.appendChild(op)

                })

            })


        })
        arquivos = document.querySelector("#arquivos")
        arquivos.value = ""
   
    })
    btnex = document.querySelector("#btn-excluir")
    btnex.addEventListener("click", function (){

        fetch("./system/API/API.php?func=listar-pasta",{method:"GET"}).then(async function (response){

            response.json().then(async function (response){
                remove = document.querySelectorAll("#select-excluir>*")
                remove.forEach(function (e){

                    e.remove()

                })
                select = document.querySelector("#select-excluir")
               await response.forEach(function (e){

                    op = document.createElement("option")
                    op.setAttribute("value",e.idPasta)
                    op.appendChild(document.createTextNode(e.nome))
                    select.appendChild(op)

                })

            })


        })
   
    })
    excl = document.querySelector("#excluir-pasta")
    excl.addEventListener("submit",function (event){
        event.preventDefault()
        fetch("./system/API/API.php?func=excluir-pasta",{

            method:"POST",
            body:new FormData(excl)

        }).then(function (response){

            response.json().then(async function (response){

                alert(response.msg)
                ajaxAvancado("./system/API/API.php?func=listar-pasta",true,"GET",null)
                await fetch("./system/API/API.php?func=listar-pasta",{method:"GET"}).then(async function (response){

                    response.json().then(async function (response){
                        remove = document.querySelectorAll("#select-excluir>*")
                        remove.forEach(function (e){
        
                            e.remove()
        
                        })
                        select = document.querySelector("#select-excluir")
                        
                       await response.forEach(function    (e){
        
                            op = document.createElement("option")
                            op.setAttribute("value",e.idPasta)
                            op.appendChild(document.createTextNode(e.nome))
                            select.appendChild(op)
                        
                        })
        
        
                })
            })

            })

        })

    })
    
    
})