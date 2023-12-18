from django import forms
from core.models import *
from django.utils.translation import gettext_lazy as _

class CarForm(forms.ModelForm):
    class Meta:
        model = Car
        # fields = "__all__"
        exclude = ('user',)
        widgets = {
            "manufacture": forms.Select(attrs={"class":"form-control col-6"}),
            "name": forms.TextInput(attrs={"class":"form-control col-6"}),
            "price": forms.NumberInput(attrs={"class":"form-control col-6"}),
            "image": forms.FileInput(attrs={"class":"form-control col-6"}),
        }
        labels = {
            "name":"Name",
        }
        help_texts = {
            "name":"enter your name here",
            "price":"the price should not exceed 100000 $",
        }
        error_messages = {
            "name": {
                "max_length": _("This name is too long."),
            },
        }


class CardForm(forms.ModelForm):
    class Meta:
        model = Card
        exclude = ()
        widgets = {
            "title": forms.TextInput(attrs={"class":"form-control col-6"}),
            "icon": forms.TextInput(attrs={"class":"form-control col-6"}),
            "desc": forms.Textarea(attrs={"class":"form-control col-6"}),
        }