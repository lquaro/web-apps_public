from django.urls import path, include
from rest_framework.routers import DefaultRouter
from .views import health, TaskViewSet

router = DefaultRouter()
router.register(r"tasks", TaskViewSet, basename="task")

urlpatterns = [
    path("health/", health),
    path("", include(router.urls)),
]