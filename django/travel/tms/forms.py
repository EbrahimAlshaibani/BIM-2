from django.forms import ModelForm
from django import forms
from tms import models
from image_uploader_widget.widgets import ImageUploaderWidget
from bootstrap_datepicker_plus.widgets import DateTimePickerInput
from django.core.exceptions import ValidationError
from dal.autocomplete import Select2
class CustmerForm(forms.ModelForm):
    class Meta:
        model = models.Customer
        fields = "__all__"
        widgets = {
            'first_name': forms.TextInput(attrs={'class': 'form-control'}),
            'last_name': forms.TextInput(attrs={'class': 'form-control'}),
            'phone_number': forms.TextInput(attrs={'class': 'form-control'}),
            'passport': forms.NumberInput(attrs={'class': 'form-control'}),
            'gender': forms.Select(attrs={'class': 'form-control'}),
            'image': forms.FileInput(attrs={'class': 'form-control'}),
        }

class AirLineForm(forms.ModelForm):
    class Meta:
        model = models.AirLine
        fields = "__all__"
        widgets = {
            'name': forms.TextInput(attrs={'class': 'form-control'}),
            'country': forms.TextInput(attrs={'class': 'form-control'}),
            'airplains_number': forms.NumberInput(attrs={'class': 'form-control'}),
        }

class FlightForm(forms.ModelForm):
    class Meta:
        model = models.Flight
        fields = "__all__"
        widgets = {
            'name': forms.TextInput(attrs={'class': 'form-control'}),
            'color': forms.TextInput(attrs={'class': 'form-control'}),
            'airline': forms.Select(attrs={'class': 'form-control'}),
            'departure': forms.TextInput(attrs={'class': 'form-control'}),
            'arrival': forms.TextInput(attrs={'class': 'form-control'}),
            'capacity': forms.NumberInput(attrs={'class': 'form-control'}),
            'datetime': DateTimePickerInput(attrs={'class': 'form-control'}),
        }

class TicketForm(forms.ModelForm):

    # def __init__(self, *args, **kwargs):
    #     super().__init__(*args, **kwargs)
    #     self.fields["flight"].queryset = self.instance.flight
    


    class Meta:
        model = models.Ticket
        fields = "__all__"
        # exclude  = ('agent',)        
        widgets = {
            'name': forms.TextInput(attrs={'class': 'form-control'}),
            'agent': Select2(attrs={'class': 'form-control'}),
            'flight': Select2(attrs={'class': 'form-control'}),
            'customer': Select2(attrs={'class': 'form-control'}),
            'price': forms.NumberInput(attrs={'class': 'form-control'}),
            'ticket_class': forms.RadioSelect(attrs={'class': 'form-check-input'}),
        }
    # def clean(self):
    #     cleaned_data = super().clean()
    #     name = cleaned_data.get("name")

        # if name:
        #     if len(name) < 5 :
        #         raise ValidationError(
        #             "The name must contains at least 5 chars!"
        #         )

    # def clean_name(self):
    #     cleaned_name = 
    #     if 
    #     return self.changed_data['name']