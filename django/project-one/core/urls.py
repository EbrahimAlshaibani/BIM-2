from django.urls import path
from core.views import *

urlpatterns = [
    path('',view=index,name="home"),
    path('car/create/',view=car_create,name="car_create"),
    path('my/cars/',view=my_cars,name="my_cars"),
    path('car/edit/<int:id>/',view=car_edit,name="car_edit"),
    path('car/delete/<int:id>/',view=car_delete,name="car_delete"),


    path('admin/',view=admin,name="admin"),
    path('admin/card/',view=admin_card,name="admin_card"),
    path('admin/card/create/',view=admin_card_create,name="admin_card_create"),
    path('admin/card/<int:id>/edit/',view=admin_card_edit,name="admin_card_edit"),
]