extends Node2D



# Called when the node enters the scene tree for the first time.
func _ready():
	var file : FileAccess = FileAccess.open("res://scene/lvl.json", FileAccess.READ)
	var text : String = file.get_as_text()
	var json_result : Variant = JSON.parse_string(text)
	print(json_result["hui"])


# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta):
	pass
