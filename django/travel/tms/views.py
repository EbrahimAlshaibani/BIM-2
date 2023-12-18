from django.shortcuts import render
from django.urls import reverse_lazy,reverse
from django.views.generic import (
    TemplateView,
    CreateView,
    DeleteView,
    DetailView,
    ListView,
    UpdateView
)
from django.contrib.auth.views import LoginView
from django.contrib.auth.mixins import LoginRequiredMixin
from django.contrib.auth.mixins import PermissionRequiredMixin
from django.core.exceptions import PermissionDenied
from django_filters.views import FilterView

from tms import models
from tms import forms
from tms import filters

class HomeView(LoginRequiredMixin,TemplateView):
    template_name = "home.html"
    flights = models.Flight.objects.all()
    
    tickets = models.Ticket.objects.all()

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context["flights"] = self.flights
        context["tickets"] = self.tickets
        return context
    

class CustomerList(ListView):
    template_name = "cusotmer/list.html"
    model = models.Customer
    # paginate_by = 2
    # def get_queryset(self):
    #     get_queryset = models.Customer.objects.filter(first_name="Ebrahim")
        # return get_queryset
    # def get_context_data(self, **kwargs):
    #     context = super().get_context_data(**kwargs)
    #     context["test"] = "test"
    #     return context

class CustomerCreate(PermissionRequiredMixin,CreateView):
    permission_required = 'tms.add_customer'
    template_name = "cusotmer/form.html"
    form_class  = forms.CustmerForm
    success_url = reverse_lazy("customers")

class CustomerDetail(PermissionRequiredMixin,DetailView):
    permission_required = 'tms.view_customer'
    template_name = "cusotmer/show.html"
    model = models.Customer

class CustomerUpdate(UpdateView):
    template_name = "cusotmer/form.html"
    form_class  = forms.CustmerForm
    model = models.Customer
    success_url = reverse_lazy("customers")

class CustomerDelete(DeleteView):
    template_name = "cusotmer/confirm.html"
    model = models.Customer
    success_url = reverse_lazy("customers")


class AirLineList(ListView):
    template_name = "airline/list.html"
    model = models.AirLine

class AirLineCreate(CreateView):
    template_name = "airline/form.html"
    form_class  = forms.AirLineForm
    success_url = reverse_lazy("airlines")

    

class AirLineDetail(DetailView):
    template_name = "airline/show.html"
    model = models.AirLine

class AirLineUpdate(UpdateView):
    template_name = "airline/form.html"
    form_class  = forms.AirLineForm
    model = models.AirLine
    success_url = reverse_lazy("airlines")

class AirLineDelete(DeleteView):
    template_name = "airline/confirm.html"
    model = models.AirLine
    success_url = reverse_lazy("airlines")

class FlightList(ListView):
    template_name = "Flight/list.html"
    model = models.Flight
    
class FlightCreate(CreateView):
    template_name = "Flight/form.html"
    form_class  = forms.FlightForm
    success_url = reverse_lazy("flights")

class FlightDetail(DetailView):
    template_name = "Flight/show.html"
    model = models.Flight

class FlightUpdate(UpdateView):
    template_name = "Flight/form.html"
    form_class  = forms.FlightForm
    model = models.Flight
    success_url = reverse_lazy("flights")

class FlightDelete(DeleteView):
    template_name = "Flight/confirm.html"
    model = models.Flight
    success_url = reverse_lazy("flights")

class TicketList(FilterView):
    template_name = "Ticket/list.html"
    model = models.Ticket
    filterset_class = filters.TicketFilter

    def get_queryset(self):
        if self.request.user.groups.filter(name="Agent").exists():
            tickets = models.Ticket.objects.filter(agent=self.request.user)
        else:
            tickets = models.Ticket.objects.all()
        
        return tickets
    
    
class TicketCreate(CreateView):
    template_name = "Ticket/form.html"
    form_class  = forms.TicketForm
    success_url = reverse_lazy("tickets")
    
    def form_valid(self, form):
        form.instance.agent = self.request.user
        return super().form_valid(form)

class TicketDetail(DetailView):
    template_name = "Ticket/show.html"
    model = models.Ticket

class TicketUpdate(UpdateView):
    template_name = "Ticket/form.html"
    form_class  = forms.TicketForm
    model = models.Ticket
    success_url = reverse_lazy("tickets")
    def get_object(self):
        ticekt = models.Ticket.objects.get(pk=self.kwargs['pk'])
        if ticekt.agent == self.request.user:
            return ticekt
        else:
            raise PermissionDenied("Forbidden user agent") 


class TicketDelete(DeleteView):
    template_name = "Ticket/confirm.html"
    model = models.Ticket
    success_url = reverse_lazy("tickets")


import pusher as push

def pusher(request):
    # pusher_client = push.Pusher(
    #     app_id='1516572',
    #     key='de88e89693fd692302a5',
    #     secret='1f653f5c498c55a3a34b',
    #     cluster='ap2',
    #     ssl=True
    # )
    # pusher_client.trigger('my-channel', 'my-event', {'message': 'hello world'})
    return render(request,'index.html',context={})
from django.http import JsonResponse

def sendMessage(request):
    msg = request.POST.get("message")
    pusher_client = push.Pusher(
        app_id='1516572',
        key='de88e89693fd692302a5',
        secret='1f653f5c498c55a3a34b',
        cluster='ap2',
        ssl=True
    )
    pusher_client.trigger('my-channel', 'my-event', msg)
    return JsonResponse({
        "message":"The message is sent successfully"
    })