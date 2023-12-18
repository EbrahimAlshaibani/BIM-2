from django.contrib import admin
from core.models import (Manufacture,
                            Car,Card,Category,Product,ProductImage)


admin.site.register(Manufacture)
admin.site.register(Car)
admin.site.register(Card)
admin.site.register(Category)
admin.site.register(Product)
admin.site.register(ProductImage)