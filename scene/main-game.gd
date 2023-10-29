extends Node2D

func _ready():
	print("game stared")
	pass # Replace with function body.


func _input(event):
	if event.is_action_pressed("ui_cancel"):
		get_tree().quit()
