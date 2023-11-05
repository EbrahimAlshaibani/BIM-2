    var username = document.getElementById("username")
    var password = document.getElementById("password")
    var title = document.getElementById("title")
    var toggleEye = document.getElementById('toggleEye')
    var formBtn = document.querySelector("#formBtn")

    // a = 5
    // b = 10
    // sumFun(a,50)
    // function sumFun(a,b = 10) {
    //     alert(a+b)
    // }



    // var marks = 50
    // if(marks>=50){
    //   console.log("Pass");
    // }else{
    //   console.log("Faild");
    // }
    
    // switch (marks) {
    //   case 50:
    //     console.log("Pass");
    //     break;
    
    //   default:
    //     console.log("Faild");
    //     break;
    // }

    // for (let index = 100; index >= 0; index--) {

    //   if(index % 2 != 0){
    //     console.log(index);
    //   }
    // }





    a = 0
    b = 0
    c = 5
    d = 10
    // if(a==b && c==d || 4 == 4){
    //   title.innerText = "equal"
    // }else{
    //   title.innerText = "not equal"
    // }
    // name = "ebrahim"
    // names = ['ahmed','ali']

    student = {
      "id": 1,
      "name":'ebrahim',
      "age":22,
      "height":187.5,
      "courses":['PHP',"Python",'Java'],
      "teachers":[
        {
          "name":"saeed",
          "age":30
        },
        {
          "name":"ali",
          "age":44
        }
      ]
    }
    student.teachers.push(
      {
        "name":"saeed",
        "age":30
      }
    )
    student.teachers.push({"name":"Khaled","age":20})
    title.innerText = student.teachers[2].name








    formBtn.addEventListener('click',submitForm)
    function submitForm() {
        formBtn.disabled = true
        formBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
    }

    isToggle = false
    toggle/.addEventListener('click',toggleEyeFun)
    function toggleEyeFun() {
    isToggle = !isToggle
      if(isToggle){
        password.type = "password"
        toggleEye.classList.remove("bi-eye")
        toggleEye.classList.add("bi-eye-slash")
      }else{
        password.type = "text"
        toggleEye.classList.remove("bi-eye-slash")
        toggleEye.classList.add("bi-eye")
      }
    }
    // username.addEventListener('click',changeTitle)
    // username.addEventListener('change',changeTitle)
    username.addEventListener('input',changeTitle)
    function changeTitle() {
      if(username.value.length >= 5){
        username.classList.remove('is-invalid')
        username.classList.add("is-valid")
      }else{
        username.classList.remove('is-valid')
        username.classList.add("is-invalid")
      }
    }