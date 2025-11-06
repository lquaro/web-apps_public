from django.http import JsonResponse
from rest_framework import viewsets

from .models import Task
from .serializers import TaskSerializer


def health(request):
    return JsonResponse({"status": "ok"})


class TaskViewSet(viewsets.ModelViewSet):
    queryset = Task.objects.order_by("-id")
    serializer_class = TaskSerializer