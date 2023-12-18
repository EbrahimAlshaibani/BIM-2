from django.contrib import admin
from tms.models import Customer,AirLine,Flight,Ticket
from tms.forms import TicketForm
from django.db import models
from django.utils.html import format_html
from image_uploader_widget.widgets import ImageUploaderWidget
from import_export.admin import ImportExportModelAdmin
from django import forms
from django_select2.forms import Select2AdminMixin
from dal import autocomplete





class AbstractAdmin(ImportExportModelAdmin):
    save_as = True
    actions_on_bottom = True
    save_on_top = True
    list_filter = ("name",)
    search_fields = ("name",)
    formfield_overrides = {
        models.ForeignKey: {"widget": autocomplete.Select2},
        models.ImageField: {"widget": ImageUploaderWidget},
    }

@admin.register(Customer)
class CustomerAdmin(AbstractAdmin):
    list_filter = ("first_name",)
    search_fields = ("first_name",)


class FlightInline(admin.TabularInline):
    model = Flight


@admin.register(AirLine)
class AirlineAdmin(AbstractAdmin):
    inlines = [
        FlightInline,
    ]



class TicketInline(admin.TabularInline):
    model = Ticket
    max_num = 10

@admin.register(Flight)
class FlightAdmin(AbstractAdmin):
    list_display = [ 
        "name","color_name",
        "airline","capacity",
        "departure","arrival",
        "datetime",
    ]
    inlines = [
        TicketInline,
    ]
    @admin.display(description="color")
    def color_name(self,obj):
        return format_html(
            '<span style="background-color: {}; color:white; border-radius:5px;">{} </span>',
                obj.color,
                obj.color,
        )



@admin.register(Ticket)
class TicketAdmin(AbstractAdmin):
    date_hierarchy = "flight__datetime"
    actions_on_bottom = True
    list_display = (
        "name","flight","it_ticket_booked",
        "ticket_airline_name","price",
        "customer","ticket_class","agent",
    )
    list_display_links = ("name","ticket_airline_name")
    list_editable = ("flight","customer","price")
    list_filter = ("name","flight","customer","ticket_class",)
    list_select_related = True
    save_as = True
    search_help_text = "Search By Name or Customer first name or price greater than"
    # readonly_fields = ("ticket_class",)
    # prepopulated_fields = {"name": ["customer"]}


    formfield_overrides = {
        # models.DateField: {'widget': DatePicker},
        models.ForeignKey: {"widget": autocomplete.Select2},
    }
    form  = TicketForm

    @admin.display(description="Airline")
    def ticket_airline_name(self,obj):
        return obj.flight.airline
    
    @admin.display(boolean=True,description="Is Booked?")
    def it_ticket_booked(self,obj):
        return obj.agent is not None

    # list_per_page  = 2
    # actions_on_top = False
    # actions_selection_counter = False
    empty_value_display = "-لا يوجد-"
    search_fields = ("name","customer__first_name","price__gt")
    ordering = ("name","flight","-price",)




    def get_queryset(self, request):
        qs = super().get_queryset(request)
        if request.user.is_superuser:
            return qs
        return qs.filter(agent=request.user)
    
    def save_model(self, request, obj, form, change):
        if obj.agent is None:
            obj.agent = request.user
        super().save_model(request, obj, form, change)
        # obj.agent_id = obj.pk
        # obj.save() 

    # fields = [
    #     "name","price",
    #     ("agent",
    #     "customer"),"ticket_class",
    #     "flight",
    # ]
    # form = TicketForm
    radio_fields = {"ticket_class": admin.HORIZONTAL}
    # autocomplete_fields = ["agent"]
    fieldsets = [
        (
            "Ticket Data",
            {
                "classes": ('col-6',),
                "fields": ["name", "price", "ticket_class", "flight"],
            },
        ),
        (
            "Agent & Customer",
            {
                # collapse
                "classes": ["col-6",],
                "fields": [
                    "agent", 
                    "customer"],
            },
        ),
    ]
    actions = [
        'set_price_to_500',
    ]
    save_on_top = True
    def set_price_to_500(self, request, queryset):
        queryset.update(price=500.0)

    set_price_to_500.short_description = "Make Price Equals to 500.0"

    class Media:
        js = ('js/main.js',)    
        css = {
                'all': ('css/admin_table.css',)
        }