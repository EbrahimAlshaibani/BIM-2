from django_filters import FilterSet
import django_filters
from tms.models import (Ticket,
    AirLine,
    Customer,
    Flight
)

class TicketFilter(FilterSet):
    # price__gte = django_filters.NumberFilter(field_name='price', lookup_expr='gte')
    # price__lt = django_filters.NumberFilter(field_name='price', lookup_expr='lt')
    # name = django_filters.CharFilter(lookup_expr="icontains")
    class Meta:
        model = Ticket
        fields = {
            "price":['lt','gt'],
            "name":['iexact','icontains'],
            "customer__first_name":["icontains",],
            "flight__airline__name":["icontains",],
        }
    @property
    def qs(self):
        parent = super().qs
        agent = getattr(self.request, 'user', None)

        return parent.filter(agent=agent)
