from django.contrib import admin
from django.urls import path,include
from django.conf import settings
from django.conf.urls.static import static
from core.views import user_login,user_logout
from django.conf.urls.i18n import i18n_patterns
urlpatterns = [
    path("i18n/", include("django.conf.urls.i18n")),
]

urlpatterns+= i18n_patterns(
    path('admin/', admin.site.urls),
    path('core/',include('core.urls')),
    path('salam/',include('salam.urls')),
    path('accounts/login/', user_login, name='login'),
    path('logout/', user_logout,name="logout"),
)+static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)