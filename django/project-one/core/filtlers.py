import django_filters
from core.models import Card

class CardFilter(django_filters.FilterSet):
    class Meta:
        model = Card
        fields = {
            'title':['icontains'],
            'desc':['icontains'],
        }