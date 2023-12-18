from django.db import models
from django.utils.translation import gettext_lazy as _
from django.contrib import admin
from django.utils.html import format_html

class Customer(models.Model):

    class Gender(models.TextChoices):
        MALE = ("m",_("male"))
        FEMALE = ("f",_("female"))

    first_name = models.CharField(_("first name"), max_length=50)
    last_name = models.CharField(_("last name"), max_length=50)
    passport = models.CharField(_("passport"), max_length=9)
    image = models.ImageField(_("imgae"), upload_to="passports",)
    phone_number = models.CharField(_("phone number"), max_length=20)
    gender = models.CharField(_("gender"), max_length=50,choices=Gender.choices)

    class Meta:
        verbose_name = _("Customer")
        verbose_name_plural = _("Customers")

    def __str__(self):
        return self.first_name + " " + self.last_name

class AirLine(models.Model):

    name = models.CharField(_("name"), max_length=50)
    country = models.CharField(_("country"), max_length=50)
    airplains_number = models.IntegerField(_("airplains number"))
    class Meta:
        verbose_name = _("AirLine")
        verbose_name_plural = _("AirLines")

    def __str__(self):
        return self.name

class Flight(models.Model):
    name = models.CharField(_("name"), max_length=50)
    color = models.CharField(_("color"), max_length=9,default="#F44336")
    airline = models.ForeignKey("tms.AirLine", verbose_name=_("airline"), on_delete=models.CASCADE,related_name="flights")
    capacity = models.IntegerField(_("capacity"))
    departure = models.CharField(_("departure"), max_length=50)
    arrival = models.CharField(_("arrival"), max_length=50)
    datetime = models.DateTimeField(_("date"), auto_now=False, auto_now_add=False)
    # seats_number = models.IntegerField(_("seats number"),default=50)
    class Meta:     
        verbose_name = _("Flight")
        verbose_name_plural = _("Flights")

    def __str__(self):
        return self.name
    
    # @admin.display(description="color")
    # def color_name(self):
    #     return format_html(
    #         '<span style="background-color: {}; color:white; border-radius:5px;">{} </span>',
    #             self.color,
    #             self.color,
    #     )


class Ticket(models.Model):
    class TicketClass(models.TextChoices):
        FIRST_CLASS = ("fc" , _("first class"))
        BUSINESS_CLASS = ("bc" , _("business class"))
        ECONOMY_CLASS = ("ec" , _("economy class"))

    agent = models.ForeignKey("auth.User", verbose_name=_("agent"), on_delete=models.CASCADE,null=True,blank=True)
    name = models.CharField(_("name"), max_length=50)
    flight = models.ForeignKey(
        "tms.Flight", 
        verbose_name=_("flight"), 
        on_delete=models.CASCADE,
        related_name="tickets",
        # limit_choices_to={'name': '432'}
        )
    
    customer = models.ForeignKey("tms.Customer", verbose_name=_("customer"), on_delete=models.CASCADE,related_name="customer_tickets")
    price = models.FloatField(_("price"),default=0.0)
    ticket_class = models.CharField(_("class"), max_length=50,choices=TicketClass.choices)
    
    class Meta:
        verbose_name = _("Ticket")
        verbose_name_plural = _("Tickets")

    def __str__(self):
        return self.name
    