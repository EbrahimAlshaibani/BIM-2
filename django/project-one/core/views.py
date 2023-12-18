from django.shortcuts import render,redirect
from core.models import Car,Manufacture
from core import models
from core.forms import CarForm,CardForm
from django.contrib.auth import authenticate,login,logout
from django.http import HttpResponse,HttpResponseRedirect,HttpResponseForbidden
from django.urls import reverse_lazy,reverse
from django.contrib import messages
from django.contrib.auth.decorators import login_required
from core.filtlers import CardFilter

def user_login(request):
    if request.user.is_authenticated:
        return HttpResponseRedirect(reverse('home'))
    if request.method == "POST":
        username = request.POST.get('username')
        password = request.POST.get('password')
        user = authenticate(username=username,password=password)
        if user:
            if user.is_active:
                login(request,user)
                return HttpResponseRedirect(reverse('home'))
            else:
                messages.info(request,"Account is not active")
                return redirect('login')
        else:
            messages.info(request,"الرجاء إدخال اسم المستخدم وكلمة السر الصحيحين")
            return redirect('login')
    else:
        return render(request,'auth/login.html')
    
@login_required
def user_logout(request):
    logout(request)
    return HttpResponseRedirect(reverse('home'))

def my_cars(request):
    cars = Car.objects.filter(user=request.user)
    cards = models.Card.objects.filter()
    context = {
        "cards":cards,
    }
    return render(request,'core/index.html',context)


def index(request):
    cards = models.Card.objects.all()
    categories = models.Category.objects.all()
    products = models.Product.objects.all()
    cars = Car.objects.all()
    context = {
        "cars":cars,
        "cards":cards,
        "categories":categories,
        "products":products,
    }
    return render(request,'core/index.html',context)

def car_create(request):
    if request.method == "POST":
        form = CarForm(request.POST,request.Files)
        if form.is_valid():
            car = form.save(commit=False)
            car.user = request.user
            car.save()
            return redirect('home')
        else:
            form = CarForm()
    else:
        form = CarForm()
    context = {
        "form":form,
    }
    return render(request,'core/form.html',context)

@login_required
def car_edit(request,id):
    car = Car.objects.get(id=id)
    if request.method == "POST":
        form = CarForm(request.POST,request.FILES,instance=car)
        if form.is_valid():
            form.save()
            return redirect('home')
        else:
            form = CarForm(instance=car)
    else:
        form = CarForm(instance=car)
    context = {
        "form":form,
    }
    return render(request,'core/form.html',context)

@login_required
def car_delete(request,id):
    car = Car.objects.get(id=id)
    if request.method == "POST":
        car.delete()
        return redirect("home")
    context = {
        "car":car
    }
    return render(request,'core/confirm_delete.html',context=context)



@login_required
def admin(request):
    
    return render(request,'core/admin/index.html')

@login_required
def admin_card(request):
    # cards = models.Card.objects.all()
    cards = CardFilter(request.GET,queryset=models.Card.objects.all())
    return render(request,'core/admin/card/index.html',context={"cards":cards})

@login_required
def admin_card_create(request):
    if request.method=="POST":
        CardForm(request.POST).save()
        return redirect("admin_card")
    else:
        form = CardForm()
        return render(request,'core/admin/card/form.html',context={"form":form})

@login_required
def admin_card_edit(request,id):
    card = models.Card.objects.get(id=id)
    if request.method=="POST":
        CardForm(request.POST,instance=card).save()
        return redirect("admin_card")
    else:
        form = CardForm(instance=card)
        return render(request,'core/admin/card/form.html',context={"form":form})

