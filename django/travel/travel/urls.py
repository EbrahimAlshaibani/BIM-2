from django.contrib import admin
from django.urls import path,include
from django.conf import settings
from django.conf.urls.static import static
from django.contrib.auth.views import LogoutView,LoginView
# from tms.views import CustomLoginView
urlpatterns = [
    path('admin/', admin.site.urls),
    path('', include("tms.urls")),
    path('accounts/login/', LoginView.as_view(template_name ='auth/login.html',next_page='home'), name='login'),
    path('logout/', LogoutView.as_view(next_page='home'), name='logout'),

]+static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
