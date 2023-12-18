# import django_filters
# from salam.models import Comment,Post
# from django import forms

# class PostFilter(django_filters.FilterSet):
#     class Meta:
#         model = Post
#         fields = ['title', 'desc']
#         widgets = {
#             "title": forms.Textarea(attrs={"class":"form-control"}),
#             "desc": forms.Textarea(attrs={"class":"form-control"}),
#         }