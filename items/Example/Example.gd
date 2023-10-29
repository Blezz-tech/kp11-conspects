extends Control


@onready var button : OptionButton = $OptionButton

@export var example_id : int = 1


func _ready() -> void:
	init_button()
	


func init_button() -> void:
	var file : FileAccess = FileAccess.open("res://items/Example/example.json", FileAccess.READ)
	var json_result : Dictionary = JSON.parse_string(file.get_as_text())
	
	var example : Variant = json_result["examples"][example_id-1]
	var property : String = example["property"]
	var values : Array = example["values"]
	
	for index in values.size():
		var text : String = property+": "+values[index]+";"
		button.add_item(text, index)
	
	button.pressed.connect(button_pressed)

func button_pressed() -> void:
	print("Hello world!")
