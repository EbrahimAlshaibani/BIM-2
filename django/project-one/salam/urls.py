from django.contrib import admin
from django.urls import path,include
from salam.views import index,create,update,delete,post_comment,comment_delete,comment_update,post_filter

urlpatterns = [
    path('', index,name="index"),
    path('posts/', index,name="posts"),
    path('posts/filter', post_filter, name="post-list"),
    path('post/create', create,name="create"),
    path('post/<int:id>/update', update,name="update"),
    path('post/<int:id>/delete', delete,name="delete"),
    path('post/<int:id>/comment/create', post_comment,name="create_comment"),
    path('comment/<int:id>/update', comment_update,name="comment_update"),
    path('comment/<int:id>/delete', comment_delete,name="comment_delete"),
]