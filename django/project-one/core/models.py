from django.db import models
from django.utils.translation import gettext_lazy as _
from django.contrib.auth.models import User
import re

def car_media_path(instance, filename):
    name = re.sub(" +", " ", str(instance.name))
    return "images/{0}/{1}/{2}".format("cars", name.replace(" ", "_"), filename)

def card_media_path(instance, filename):
    name = re.sub(" +", " ", str(instance.product.name))
    return "images/{0}/{1}/{2}".format("cards", name.replace(" ", "_"), filename)


class Manufacture(models.Model):
    center_choices = {
        ("Yemen","اليمن"),
        ("Egypt","مصر"),
        ("Jorden","الاردن"),
    }
    name = models.CharField(_("name"), max_length=50)
    center = models.CharField(_("center"), max_length=50,choices=center_choices)
    def __str__(self):
        return self.name

class Car(models.Model):
    user = models.ForeignKey(User, verbose_name=_("user"), on_delete=models.CASCADE,null=True,blank=True)
    manufacture = models.ForeignKey("core.Manufacture", verbose_name=_("manufacture"), on_delete=models.CASCADE)
    image = models.ImageField(_("image"), upload_to=car_media_path,null=True,blank=True)
    name = models.CharField(_("name"), max_length=50)
    price = models.FloatField(_("price"),null=True,blank=True)
    def __str__(self):
        # return self.manufacture.name + " " +  self.name
        return "{} | {}".format(self.manufacture.name,self.name)
    

class Card(models.Model):
    icon = models.CharField(_("icon"), max_length=50)
    title = models.CharField(_("title"), max_length=50)
    desc = models.TextField(_("description"))
    def __str__(self):
        return self.title


class Category(models.Model):
    name = models.CharField(_("name"), max_length=50)
    def __str__(self):
        return self.name

class Product(models.Model):
    category = models.ForeignKey("core.Category", verbose_name=_("category"), on_delete=models.CASCADE,related_name="products")
    name = models.CharField(_("name"), max_length=50)
    seller = models.ForeignKey(User, verbose_name=_("seller"), on_delete=models.CASCADE,related_name='seller_products')
    url = models.URLField(_("url"), max_length=200)
    title = models.CharField(_("title"), max_length=50)
    desc = models.TextField(_("Dscription"))
    price = models.FloatField(_("price"))
    date = models.DateField(_("date"), auto_now=False, auto_now_add=True)
    def __str__(self):
        return self.name
    
class ProductImage(models.Model):
    product = models.ForeignKey("core.Product", verbose_name=_("products"), on_delete=models.CASCADE,related_name="images")
    image = models.ImageField(_("image"), upload_to=card_media_path)
    def __str__(self):
        return self.product.name