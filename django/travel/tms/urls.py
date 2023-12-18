from django.urls import path
from tms import views

urlpatterns = [
    path('',views.HomeView.as_view(),name="home" ),
    path('customers/',views.CustomerList.as_view(),name="customers" ),
    path('customers/create',views.CustomerCreate.as_view(),name="customers_create" ),
    path('customers/<int:pk>',views.CustomerDetail.as_view(),name="customers_detail" ),
    path('customers/<int:pk>/update',views.CustomerUpdate.as_view(),name="customers_update" ),
    path('customers/<int:pk>/delete',views.CustomerDelete.as_view(),name="customers_delete" ),

    path('airlines/',views.AirLineList.as_view(),name="airlines" ),
    path('airlines/create',views.AirLineCreate.as_view(),name="airlines_create" ),
    path('airlines/<int:pk>',views.AirLineDetail.as_view(),name="airlines_detail" ),
    path('airlines/<int:pk>/update',views.AirLineUpdate.as_view(),name="airlines_update" ),
    path('airlines/<int:pk>/delete',views.AirLineDelete.as_view(),name="airlines_delete" ),

    path('flights/',views.FlightList.as_view(),name="flights" ),
    path('flights/create',views.FlightCreate.as_view(),name="flights_create" ),
    path('flights/<int:pk>',views.FlightDetail.as_view(),name="flights_detail" ),
    path('flights/<int:pk>/update',views.FlightUpdate.as_view(),name="flights_update" ),
    path('flights/<int:pk>/delete',views.FlightDelete.as_view(),name="flights_delete" ),

    path('tickets/',views.TicketList.as_view(),name="tickets" ),
    path('tickets/create',views.TicketCreate.as_view(),name="tickets_create" ),
    path('tickets/<int:pk>',views.TicketDetail.as_view(),name="tickets_detail" ),
    path('tickets/<int:pk>/update',views.TicketUpdate.as_view(),name="tickets_update" ),
    path('tickets/<int:pk>/delete',views.TicketDelete.as_view(),name="tickets_delete" ),



    path('pusher/',views.pusher,name="pusher"),
    path('send/',views.sendMessage,name="sendMessage" ),



]